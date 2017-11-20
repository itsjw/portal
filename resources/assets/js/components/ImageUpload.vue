<template>
    <div class="file">
        <label class="file-label">
            <input class="file-input" type="file" accept="image/*" @change="onChange">
            <span class="file-cta">
              <span class="file-icon">
                <i class="fa fa-upload"></i>
              </span>
              <span class="file-label">
                Choose a file…
              </span>
            </span>
        </label>
    </div>
</template>

<script>
    export default {
        methods: {
            onChange: function (e) {
                if (!e.target.files.length) return;

                let file = e.target.files[0];

                let reader = new FileReader();

                reader.readAsDataURL(file);

                reader.onload = e => {
                    let src = e.target.result;

                    this.$emit('loaded', {src, file});
                };
            }
        }
    }
</script>
