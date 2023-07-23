const { createApp} = Vue;

const app = createApp({
    data(){
        return {
            tasks: [],
            newTask: '',
        } 
    },
    methods: {
        addTask() {
            // preparo i dati
            const data = {task : this.newTask};

            //preparo le configurazioni
            const config = {headers: {'Content-Type' : 'multipart/form-data'}}

            axios.post('http://localhost:8888/php-todo-list-json/api/tasks/', data, config)
            .then(res => {
                this.tasks.push(res.data);
                this.newTask = '';
            });

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