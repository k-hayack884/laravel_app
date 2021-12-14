const app=Vue.createApp({
  data:()=>({
    newItem:'',
    todos:[]
  }),
  methods:{
    books:function(){
      //console.log('ﾌﾞｯｸｽ!')
      if(this.newItem==='')return

      let todo={
        item:this.newItem,
        isDone: false
      }
      this.todos.push(todo)
      this.newItem=''
    },
    sarugasso:function(index){
      //console.log('姑息な手を')
      //console.log(index)
      this.todos.splice(index,1)
    }
  }
})
app.mount('#app')