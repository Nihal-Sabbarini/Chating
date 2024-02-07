<template>
    <li class="felx felx-col mb-4 bg-pink-200 p-2 rounded-l-full transition-all message-line sender-message-line">
        <div class="mb-2 text-end text-teal-700 message-username">
            {{ message.sender.name }}
        </div>
        <div class="text-end text-sm message-text">
            {{ message.content }}
        </div>
        <div class="text-right mt-3 text-xs message-time">
            <i class="fas fa-solid fa-clock">
            {{ message.time_ago }}
            </i>
        </div>
    </li>
</template>

<script>
export default{
    name: "Sender",
    props : ["message"]
}
</script>

<style scoped>

</style>

