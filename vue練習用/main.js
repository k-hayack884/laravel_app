const app=Vue.createApp({
  data:()=>({
    newItem:'',
    todos:[]
  }),
  methods:{
    books:function(){
      console.log('ﾌﾞｯｸｽ!')
      let todo={
        item:this.newItem
      }
      this.todos.push(todo)
    }
  }
})
app.mount('#app')