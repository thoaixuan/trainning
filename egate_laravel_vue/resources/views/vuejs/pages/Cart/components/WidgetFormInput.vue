<template>
    <div class="flex flex-wrap w-100">
        <label class="w-full text-gray-600 font-medium py-1">
            <slot name="title">
            
            </slot>
        </label>
        <span class="w-100">
            <slot>
                
            </slot>
        </span>
        <span class="w-100">
            <slot name="info">
                
            </slot>
        </span>
    </div>
</template>

<script>
    export default {
        data(){
            return {}
        }
    }
</script>

<style></style>