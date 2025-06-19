<template>
  <div id="app">
    <todo-app></todo-app>
    <todo-form @todo-added="reloadTodos++" />
    <display-todo :reload="reloadTodos" />
  </div>
</template>

<script>
import TodoApp from './components/TodoApp.vue';
import TodoForm from './components/TodoForm.vue';
import DisplayTodo from './components/DisplayTodo.vue';

export default {
  components: {
    TodoApp,
    TodoForm,
    DisplayTodo,
  },
  data() {
    return {
      reloadTodos: 0
    };
  }
};
</script>