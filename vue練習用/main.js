const app=Vue.createApp({
  data:()=>({
message:''
  }),
  methods:{
    clickHandler:function(){

      //console.log(message)
      this.message=new Date()
    }
  }

})
app.mount('#app')
