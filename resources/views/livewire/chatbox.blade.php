<div class="relative h-full flex flex-col selection:bg-red-500 selection:text-white">
    <div
        class="w-full h-full pb-24 lg:p-8 text-white overflow-y-auto space-y-6"
        id="conversation-container"
        x-init="document.querySelector('.last-dialog-container').scrollIntoView()"
    >
        @foreach ($responses as $response)
            <div class="p-4 border border-white rounded dialog-container{{ $loop->last ? ' last-dialog-container' : ''}}">
                <div class="mb-4 text-right w-full">
                    <label class="underline">User</label>
                    <p>{{ $response['user'] }}</p>
                </div>
                <div>
                    <label class="underline">Assistant</label>
                    <p>{{ $response['assistant'] }}</p>
                </div>
            </div>
        @endforeach
        <div
            wire:loading
            id="dialog-loading-container"
            class="p-4 border border-white rounded w-full"
        >
            <div class="mb-4 text-right">
                <label class="underline">User</label>
                <p x-text="$wire.userMessage"></p>
            </div>
            <div>
                <label class="underline">Assistant</label>
                <p>
                    <span class="inline-block animate-bounce">.</span>
                    <span class="inline-block animate-bounce animation-delay-200">.</span>
                    <span class="inline-block animate-bounce animation-delay-400">.</span>
                </p>
            </div>
        </div>
    </div>
    <div class="flex align-items-end" x-data>
        <textarea
            name="chat-input"
            placeholder="Enter a message"
            wire:model="message"
            wire:keydown.enter.prevent="submit"
            wire:loading.attr="disabled"
            x-on:message-added.window="$el.focus()"
            class="w-full p-6 shadow-lg rounded leading-none border-none bg-gray-300 overflow-y-hidden resize-none focus:ring-0"
            {{-- x-init="$el.style.height = '62px';"
            @input="$event.target.style.height = '62px';$event.target.style.height = ($event.target.scrollHeight + 62) + 'px'" --}}
            @keydown.enter="submitMessage($wire)"
        >{{ $message }}</textarea>
    </div>
</div>

<script>
    const targetNode = document.getElementById('dialog-loading-container')
    const observer = new MutationObserver(function() {
        if (targetNode.style.display != 'none') {
            targetNode.scrollIntoView({ behavior: 'smooth' })
        }
    })

    observer.observe(targetNode, { attributes: true, childList: true })

    function submitMessage($wire) {
        $wire.userMessage = $wire.message
        $wire.message = ''
    }
</script>
