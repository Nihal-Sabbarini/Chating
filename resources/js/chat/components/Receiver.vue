<template>
    <li class="felx felx-col mb-4 bg-gray-200 p-2 rounded-r-full transition-all message-line receiver-message-line">
        <div class="mb-2 text-start text-teal-700 message-username">
            {{ message.sender.name }}
        </div>
        <div class="text-start text-sm message-text">
            {{ message.content }}
        </div>
        <div class="text-left mt-3 text-xs message-time">
            <i class="fas fa-solid fa-clock">
            {{ message.time_ago }}
            </i>
        </div>
    </li>
</template>

<script>
export default{
    name: "Receiver",
    props : ["message"]
}
</script>

<style scoped>

</style>

