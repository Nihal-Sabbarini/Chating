<template>
<div class="flex flex-col inline-block relative mx-2.5 w-80 z-99999 ring chat-panel">
<header class="px-2 py-4 flex flex-row items-center bg-teal-700">
<i class="fas fa-solid fa-times shrink mx-2 text-white cursor-pointer" title="close"
@click="$emit('onCloseChat', user)"></i>
<div class="flex-2 grow basis-1/2 text-white">{{user.name}}</div>
</header>
<section class="px-2 py-4 h-72 overflow-y-scroll chat-panel-content" ref="chatContentRef">
    <ul>
        <MessageLine v-for="userMessage in userMessages" :key="userMessage.id" :message="userMessage"/>

    </ul>
</section>

<footer class="flex flex-row items-center chat-panel-footer">
    <a href="#" @click.prevent="submitMessage" class="px-1 h-full bg-blue-700 text-white items-center flex">
        <i class="fas fa-solid fa-paper-plane mx-1">

        </i>
        Send
    </a>
    <textarea name="currentMessage" class="grow p-2 border border-solid border-gray-300" v-model="messageContent"></textarea>
</footer>
</div>
</template>

<script>
import {ref} from "vue";
import MessageLine from '@/chat/components/MessageLine.vue';
export default{
    name: "ChatPanel",
    components: {MessageLine},
    props: ["user" , "emittedMessage"],
    emits: ["onCloseChat"],
    setup(props) {
        const {user} = props;
        const chatContentRef = ref(null);
        const messageContent = ref("");
        const userMessages = ref([]);

        function submitMessage() {
            if(!messageContent.value){
                return;
            }

            const payload = {
                receiver_id: user.id,
                message_content: messageContent.value

            };

            window.axios.post("/messages", payload)
            .then(response =>{
                if(response && response.data.status){
                    userMessages.value.push(response.data.message);
                    messageContent.value = "";
                    scrollToChatBottom();
                }

            }).catch(error => {
                console.error(error.response);
            });
        }

        async function getMessages()
        {
            const result = await window.axios.get(`/messages?receiver_id=${user.id}`);
            if(result.data.messages){
                userMessages.value = result.data.messages.reverse();
                scrollToChatBottom();
            }
        }

        function scrollToChatBottom()
        {
            setTimeout(() => {
                if(chatContentRef && chatContentRef.value){
                    chatContentRef.value.scrollTop = chatContentRef.value.scrollHeight; // Fix the typo here

                }
            },300);
        }

        getMessages();
        return {
            messageContent,
            submitMessage,
            userMessages,
            chatContentRef
        }
    }
}
</script>

<style scoped>


</style>

