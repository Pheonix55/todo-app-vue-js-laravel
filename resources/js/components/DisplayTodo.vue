<template>


    <div class="wrapper">
        <h4>Active todos</h4>
        <div class="active_todos">
            <div class="todos_list">
                <ul v-if="todos.length > 0">
                    <li v-for="todo in todos" :key="todo.id">
                        <div>
                            <p class="heading">{{ todo.name }}</p>
                            <p>{{ todo.description }}</p>
                        </div>
                        <div>
                            <span v-if="todo.is_completed">✅</span>
                            <span v-else>❌</span>
                        </div>
                    </li>
                </ul>
                <p v-else>No todos found.</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            todos: []
        };
    },
    methods: {
        fetchTodos() {
            fetch('/todos', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(async (response) => {
                    if (!response.ok) {
                        const err = await response.json();
                        throw new Error(err.message);
                    }
                    return response.json();
                })
                .then((data) => {
                    this.todos = data.data.data;
                })
                .catch((error) => {
                    console.log('Error: ', error.message);
                });
        }
    },
    props: ['reload'],
    watch: {
        reload() {
            this.fetchTodos();
        }
    },
    mounted() {
        this.fetchTodos();
    }
};
</script>
<style>
.wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.active_todos {

    max-height: 300px;
    overflow-y: scroll;
    width: 500px;

}

.active_todos::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

.active_todos::-webkit-scrollbar-track {
    background: var(--color-surface-hover);
}

.active_todos::-webkit-scrollbar-thumb {
    background: var(--color-surface);
    border-radius: 4px;
}


.todos_list {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;

    ul {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 5px;
        padding: 0;
    }

    li {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px solid var(--color-surface);
        padding-inline: 15px;
        border-radius: 2px;
        line-height: 10px;
    }

    li .heading {
        font-weight: 600;
        font-size: 20px;
        color: var(--color-text);
    }
}
</style>
<!-- <template>
    <div style="background: red; color: white; padding: 10px;">
      <strong>DisplayTodo is rendering!</strong>
    </div>
  </template> -->