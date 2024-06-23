<script setup>
  import { computed, onMounted } from 'vue';
  import { useStore } from 'vuex';
  import api from './utils/api';

  import TaskList from './components/TaskList.vue';
  import TaskForm from './components/TaskForm.vue';

  const store = useStore();
  const tasks = computed(() => store.getters.tasks)

  onMounted(() => {
    store.dispatch('fetchTasks');
  })

</script>

<template>
  <div class="container">
    <h1>📌 Task Management</h1>
    
    <div class="hr"></div>
    <TaskForm />

    <TaskList class="tasks-container" :tasks="tasks" />
  </div>
</template>

<style lang="scss" scoped>
  .container {
    margin-top: 10px;
  }
  
  .tasks-container {
    margin-top: 20px;
  }

</style>