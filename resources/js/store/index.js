import { createStore } from 'vuex';
import api from '../utils/api';

export default createStore({
  state: {
    tasks: []
  },

  mutations: {
    ADD_TASK(state, task){
      state.tasks.push(task)
    },

    DELETE_TASK(state, taskId){
      state.tasks = state.tasks.filter(task => task.id !== taskId)
    },

    UPDATE_TASK(state, updatedTask){
      const taskIndex = state.tasks.findIndex(task => task.id === updatedTask.id)
      state.tasks[taskIndex] = updatedTask;
    },
    
    SET_TASKS(state, tasks){
      state.tasks = tasks;
    }
  },

  actions: {

    async fetchTasks({ commit }) {
      try {
        const { data } = await api.get('/tasks')
        data.tasks && commit('SET_TASKS', data.tasks)
      } catch (err){
        console.error(err)
      }
    },

    async addTask({ commit }, title) {
      try {
        const { data } = await api.post('/tasks', {
          title
        });
        
        data.task && commit('ADD_TASK', data.task)
      }catch(err){
        console.log(err);
      }
    },

    async updateTask({ commit }, task){
      try {
        const { data } = await api.put(`/tasks/${task.id}`, {
          completed: task.completed 
        });
        
        data.task && commit('UPDATE_TASK', data.task)
      }catch(err){
        console.log(err);
      }
    },

    async deleteTask({ commit }, taskId){
      try {
        await api.delete(`/tasks/${taskId}`);
        commit('DELETE_TASK', taskId)
      }catch(err){
        console.log(err);
      }
    }
  },

  getters: {
    tasks: (state) => state.tasks
  }
})