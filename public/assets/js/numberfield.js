Vue.component('Numberfield', {
  props: {
    isLabelTop: {
      type: Boolean,
      default: false,
    },
    inline: {
        type:Boolean,
        default:false
    },
    decimals: {
        type:Number,
        default:4
    },
    more: {
        type:Number,
        default:null
    },
    min: {
        type:Number,
        default:null
    },
    max: {
        type:Number,
        default:null
    },
    name: {
        type:String,
        required:false
    },
    value:  {
        // type:Number,
        default:null
    },
    label: {
        type:String,
        default:''
    },
    placeholder: {
        type:String,
        default:'Number'
    },
    listener:null,
    readonly:false,
    required:false,
    hidden:false
  },
  watch:{
    readonly(v){
      this.readonly_= v
    },
    value(v){
      this.setValue(v)
    }
  },
  computed:{
    title:function(){
      let basic = this.required_?'Required':'Optional'      
      if( this.min!==null ){
        basic+=` Min: ${this.min}`
      }
      
      let max;
      if( this.max!==null ){
        max = parseFloat(parseFloat(this.max).toFixed(this.decimals))
      }
      if( this.max ){
        basic+=` Max: ${max}`
      }
      if( this.more!==null ){
        basic+=` More than: ${this.more}`
      }
      return basic
    }
  },
  data() {
      return {
        textValid : "",
        textInvalid: "",
        isValid:true,
        value_:null,
        required_:false,
        readonly_:false,
        hidden_:false,
        label_:"",
        name_:"",
        placeholder_:"",
      }
  },
  created(){
    this.value_ = this.value;
    try{
      this.value_ = parseFloat(parseFloat(this.value_).toFixed(this.decimals))
      if(isNaN(this.value_)){
        this.value_=0
      }
    }catch(e){
      this.value_ = 0
    }
    this.required_=this.required;
    this.readonly_=this.readonly;
    this.hidden_=this.hidden;
    this.label_=this.label;
    this.name_=this.name;
    this.placeholder_=this.placeholder;
    this.$nextTick(function(){
      this.onchangeOriginal({type:"created"});
      this.onBlur(null)
    })
  },
  methods: {
    onChange(evt){
      let error = '';
      if( this.more!==null && this.value_<=this.more ){
        this.value_ = this.more+0.1
        error += `Value harus lebih besar dari ${this.more}<br>`
      }
      let max;
      if( this.max!==null ){
        max = parseFloat(parseFloat(this.max).toFixed(this.decimals))
      }
      if( this.max!==null && this.value_>max ){

        this.value_ = max
        error += `Value tidak boleh melebihi ${max}`
      }
      if(error!==''){
        this.$alertify.alertWithTitle("Warning", error);
      }
      this.onchangeOriginal(evt);
      this.$emit('update:value',this.getValue());
    },
    keyDownNumber(event){
      let key = event.key;
      if(key=="."){
        if( (this.value_)===null || ((this.value_).toString()).length==0 || ((this.value_).toString()).includes(".") ){
            event.preventDefault();
            return false;
        }
      }
      if(key=="-"){
        if( this.value_===null || (this.value_.toString()).includes("-") ){
            event.preventDefault();
            return false;
        }
      }
      if( !(/^[0-9.-]{1,}$/).test(key)
        && !["ArrowLeft","ArrowRight","Backspace","Delete","Tab"].includes(key)
        && !(event.ctrlKey===true && ["v","c","x","a"].includes(key)) ){
        event.preventDefault();
        return false;
      }
      this.$emit('update:value',this.getValue());
    },
    keyUpNumber(event){
      
      let me = this;
      if(me.value_=="-" || me.value_==""){return;}
      if(me.value_!==null && me.value_!=""&& me.value_!="."){
        let rawValue =me.value_;
        try{ rawValue = rawValue.toString() }catch(e){}
        var val,decimal;
        if( (rawValue).includes(".") ){
            val = ( (rawValue).split(".")[0] ).replace(/,/g,"");
            decimal = ((rawValue).split(".")[1]).length==0?"":(rawValue).split(".")[1];
        }else{
            val = (rawValue).replace(/,/g,"");
            decimal="00";
        }
        let formattedVal = parseFloat(val).toLocaleString('en');
        me.value_=formattedVal+((rawValue).includes(".")?`.${decimal}`:"");
      }
      this.onchangeOriginal({type:"keyup"});
      this.$emit('update:value',this.getValue());
    },
    onBlur(triggerChange=true){
      let me = this;
      if(me.value_===null || me.value_==""){me.value_=0;return;}
      if( me.value_!==null && me.value_!=""&& me.value_!="." ){
        let rawValue = (me.value_).toString();
        var val,decimal;
        if( (rawValue).includes(".") ){
            val = ( (rawValue).split(".")[0] ).replace(/,/g,"");
            decimal = ((rawValue).split(".")[1]).length==0?"00000":(rawValue).split(".")[1];
            decimal=decimal.slice(0,me.decimals);
        }else{
            val = (rawValue).replace(/,/g,"");
            decimal="00";
        }
        let formattedVal = parseFloat(val).toLocaleString('en');
        const oldValue = me.value_;
        if(parseInt(decimal)==0){
          me.value_=formattedVal;
        }else{
          me.value_ = formattedVal+((rawValue).includes(".")?`.${decimal}`:"");
        }
        try{
          if( typeof(oldValue)==='string' && typeof(me.value_)==='string' && parseFloat(oldValue.replace(/,/g,""))!=parseFloat(me.value_.replace(/,/g,"")) ){
            let errorString = `inputan numerik maximum ${me.decimals} angka di belakang koma`;
            $alertify.alertWithTitle(
              "Warning!",
              me.decimals>0?errorString:"Inputan numerik tidak boleh mengandung pecahan decimal"
            );
            triggerChange = false;
            this.setValue(parseInt(me.value_))            
            this.$emit('update:value',this.getValue());
          }
        }catch(e){}
      }
      if(triggerChange){
        this.onchangeOriginal({type:"change"});
      }
    },
    getValue(){
      try{
        return parseFloat( (this.value_).replace(/,/g,"") );
      }catch(e){
        return 0;
      }
    },
    setValue(val='',triggerChange=true){
        if(val){
          this.value_= parseFloat(Number(val).toFixed(this.decimals));
        }else{
          this.value_= val;
        }
        this.$forceUpdate();
        // if(triggerChange){
          this.onBlur(triggerChange)
        // }
        return true;
    },
    setError(val=''){
        this.textInvalid=val;
        this.isValid=false;
        return true;
    },
    getError(){
        return this.textInvalid;
    },
    getValid(){
        const basicValid = (this.value_===null||this.value_=='')?!this.required_:true;
        if(!basicValid){
          return basicValid;
        }
        if(this.min!==null && this.getValue()<this.min){
          return false;
        }
        if(this.max!==null && this.getValue()>parseFloat(parseFloat(this.max).toFixed(this.decimals))){
          return false;
        }
        if(this.more!==null && !(this.getValue()>this.more) ){
          return false;
        }
        return true;
    },
    setSuccess(val=''){
        this.textValid=val;
        this.isValid=true;
        return true;
    },
    setLabel(val){
        this.label_=val;
        return true;
    },
    setRequired(val){
        this.required_=val;
        return true;
    },
    setHidden(val){
        this.hidden_=val;
        return true;
    },
    setReadOnly(val){
        this.readonly_=val;
        return true;
    },
    setPlaceholder(val){
        this.placeholder_=val;
        return true;
    },
    onchangeOriginal(evt){
        let type='change';
        if(evt['type']!==undefined){
            type=evt.type;
        }
        if(['keyup','change'].includes(type) ){
          this.isValid = this.getValid();
          try{
            this.$emit('update:value',this.getValue());
            if (isNaN(this.getValue())){
              this.setValue(null,false);
            }
          }catch(e){}
        }
        if(this.listener!==null){
            if(this.$parent.listener !== undefined){
                this.$parent.listener(this,type,this.getValue(),evt)
            }else if(this.listener !== undefined){
                this.listener(this,type,this.getValue(),evt);
            }
        }
    }
  },
  template:  `
  <input type="text"
      autocomplete="off"
      :name="name_"
      :readonly="readonly_?true:false"
      :placeholder="placeholder_"
      v-model="value_"
      v-if="!hidden_"
      @change="onChange"
      @focus="onchangeOriginal"
      @keydown="keyDownNumber"
      @keyup="keyUpNumber"
      @blur="onBlur"
      />`
})