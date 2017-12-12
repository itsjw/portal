<template>
    <div>
        <input id="trix" type="hidden" name="body">
        <trix-editor input="trix"></trix-editor>
    </div>
</template>

<script>
    import Trix from 'trix';

    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
