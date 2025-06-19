<template>
    <form @submit.prevent="addTodo">

        <div v-if="successMessage" class="success-msg">{{ successMessage }}</div>
        <div v-if="errorMessage" class="error-msg">{{ errorMessage }}</div>

        <div class="form-group">
            <label for="todo_name">Name</label>
            <input type="text" v-model="name" id="todo_name" />
        </div>

        <div class="form-group">
            <label for="todo_description">Description</label>
            <textarea v-model="description" id="todo_description"></textarea>
        </div>

        <div class="form-group">
            <label>Mark done</label>
            <label><input type="radio" value="true" v-model="is_completed" /> Yes</label>
            <label><input type="radio" value="false" v-model="is_completed" /> No</label>
        </div>

        <button type="submit">Add</button>
    </form>
</template>

<script>
export default {
    data() {
        return {
            name: '',
            description: '',
            is_completed: 'false',
            successMessage: '',
            errorMessage: '',
        };
    },
    methods: {
        addPostTodo(todo) {
            fetch('/todos/post', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: JSON.stringify(todo),
            })
                .then(async (response) => {
                    if (!response.ok) {
                        const err = await response.json();
                        throw new Error(err.message);
                    }
                    return response.json();
                })
                .then((data) => {
                    this.successMessage = data.message || 'Todo created successfully!';
                    this.errorMessage = '';
                    this.$emit('todo-added');
                    setTimeout(() => {
                        this.successMessage = '';
                    }, 3000);

                })
                .catch((error) => {
                    this.errorMessage = error.message || 'Something went wrong.';
                    this.successMessage = '';
                    setTimeout(() => {
                        this.errorMessage = '';
                    }, 3000);

                });
        },

        addTodo() {
            const todo = {
                name: this.name,
                description: this.description,
                is_completed: this.is_completed === 'true',
            };

            this.addPostTodo(todo);

            this.name = '';
            this.description = '';
            this.is_completed = 'false';
        },
    },
};
</script>

<style scoped>
form {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    padding: 1rem;
    border: 1px solid var(--color-surface-hover);
    background-color: var(--color-surface);
    color: var(--color-text);
    border-radius: 8px;
}

.success-msg {
    background-color: var(--color-success);
    color: var(--color-text);
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
}

.error-msg {
    background-color: var(--color-danger);
    color: var(--color-text);
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
}


.form-group {
    display: flex;
    flex-direction: column;
    width: 100%;
    max-width: 400px;
}

label {
    font-size: 14px;
    margin-bottom: 4px;
}

input[type='text'],
textarea {
    padding: 0.5rem;
    border-radius: 4px;
    border: 1px solid var(--color-border);
    background-color: var(--color-bg);
    color: var(--color-text);
}

button[type='submit'] {
    background-color: var(--color-primary);
    color: var(--color-bg);
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>