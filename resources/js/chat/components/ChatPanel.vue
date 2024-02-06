<template>
<div class="flex flex-col inline-block relative mx-2.5 w-80 z-99999 ring chat-panel">
<header class="px-2 py-4 flex flex-row items-center bg-teal-700">
<i class="fas fa-solid fa-times shrink mx-2 text-white cursor-pointer" title="close"
@click="$emit('onCloseChat', user)"></i>
<div class="flex-2 grow basis-1/2 text-white">{{user.name}}</div>
</header>
<section class="px-2 py-4 h-72 overflow-y-scroll chat-panel-content">
    <ul>
        <MessageLine/>
        <MessageLine/>
        <MessageLine/>
        <MessageLine/>
        <MessageLine/>
        <MessageLine/>
        <MessageLine/>
        <MessageLine/>
        <MessageLine/>
        <MessageLine/>
    </ul>
</section>

<footer class="flex flex-row items-center chat-panel-footer">
    <a href="#" class="px-1 h-full bg-blue-700 text-white items-center flex">
        <i class="fas fa-solid fa-paper-plane mx-1">

        </i>
        Send
    </a>
    <textarea name="currentMessage" class="grow p-2 border border-solid border-gray-300"></textarea>
</footer>
</div>
</template>

<script>
import MessageLine from '@/chat/components/MessageLine.vue';
export default{
    name: "ChatPanel",
    components: {MessageLine},
    props: ["user" , "emittedMessage"],
    emits: ["onCloseChat"]
}
</script>

<style scoped>


</style>

