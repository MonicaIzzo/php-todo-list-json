const { createApp} = Vue;

const app = createApp({
    data(){
        return {
            tasks: []
        } 
    },
    created() {
        axios.get('http://localhost:8888/php-todo-list-json/api/tasks/')
        .then(res => {
            this.tasks = res.data;
        });

    }

})

app.mount('#app')