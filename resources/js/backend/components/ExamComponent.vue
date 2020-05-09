<template>
    <div class="card">
        <div class="card-header">
            <i class="fas fa-code"></i> Example Vue Component
        </div>
        <div class="card-body">
          <ul>
            <li v-for="todo in todos">
              {{ todo.text }} - {{ messageHey }}
            </li>
          </ul>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                messageHey: 'hey',
                todos: [
                    { text : 'hello'},
                    { text : 'second'}
                ],
            }
        },
    }
</script>
