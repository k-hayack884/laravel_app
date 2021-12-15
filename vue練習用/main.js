const app=Vue.createApp({
  data:()=>({
 message:'ブックス！',
  }),
  computed:{
    reversedMessage:function(){
      return this.message.split('').reverse().join('')
    }
  },
  methods:{

  }
})
app.mount('#app')