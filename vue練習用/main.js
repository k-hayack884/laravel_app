const app=Vue.createApp({
  data:()=>({
    
  }),
  computed:{
computedNumber:function(){
  return Math.random()

}
  },
  methods:{
    methodsNumber:function(){
      return Math.random()
    }
    
  }
})
app.mount('#app')