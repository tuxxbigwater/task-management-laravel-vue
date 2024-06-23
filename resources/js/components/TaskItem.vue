<template>
  <div class="task-item">
    <div class="item-content">
      <input class="item-status" type="checkbox" @change="() => toggleComplete(task)" :checked="task.completed">
      <div class="item-details">
        <span class="item-title" :class="{completed: task.completed}">{{ task.title }}</span>
        <span class="item-timestamp">{{ task.completed ? `Marked as done at ${readableTimestamp(task.updated_at)}` : readableTimestamp(task.created_at) }}</span>
      </div>
    </div>
    <span>
      <button class="delete" @click="() => deleteTask(task.id)">❌</button>
    </span>
  </div>
</template>

<script setup>
  import { useStore } from 'vuex';

  const store = useStore();

  const props = defineProps({
    task: {
      type: Object,
      required: true
    }
  });

  const toggleComplete = task => {
    store.dispatch('updateTask', {
      id: task.id,
      completed: !task.completed
    });
  }

  const deleteTask = taskId => {
    store.dispatch('deleteTask', taskId);
  }

  const readableTimestamp = dateString => {
    const d = new Date(dateString);
    return d.toLocaleString();
  }
</script>

<style lang="scss" scoped>
  .task-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 1.2em;
    letter-spacing: .15cap;
    height: 60px;

    & .item-content {
      display: flex;
      gap: 20px;

      & .item-details {
        display: flex;
        flex-direction: column;

        & .item-timestamp {
          font-size: .7em;
          color: #aaa;
        }

      }
    }

    & .item-status {
      width: 20px;
      height: 20px;
      cursor: pointer;
    }

    & .item-title.completed {
      text-decoration: line-through;
      color: #aaa;
    }

    & button.delete {
      background: transparent;
      border: none;
      opacity: .5;
      transition: opacity ease-in-out .25s;
      
      &:hover {
        cursor: pointer;
        opacity: 1;
      }
    }

    & .completed-info {
      font-size: .7em;
      color: #ddd;
    }
  }

</style>