<template>
    <li class="flex flex-col mb-4 bg-blue-200 p-2 rounded-r-full transition-all message-line receiver-message-line">
    <b>
        <div class="mb-2 text-start text-black-700 message-username">
            {{ message.sender.name }}
        </div>
    </b>
        <b><div class="text-start text-sm message-text" v-html="message.content">
        </div></b>
        <div class="text-center mt-3 text-xs message-time">
            <i class="fas fa-solid fa-clock"></i>
            {{ message.time_ago }}
        </div>
    </li>
</template>

<script>
export default {
    name: "Receiver",
    props: ["message"]
}
</script>

<style scoped>

</style>
