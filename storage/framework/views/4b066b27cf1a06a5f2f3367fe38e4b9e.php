
<div class="container">
    <h1>Chat with <?php echo e($user->name); ?></h1>
    <div id="chat-messages">
        <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p>
                <strong><?php echo e($chat->sender->name); ?>:</strong> <?php echo e($chat->message); ?>

            </p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <form id="chat-form">
        <?php echo csrf_field(); ?>
        <input type="text" name="message" id="chat-message" placeholder="Type a message..." required>
        <button type="submit">Send</button>
    </form>
</div>
<script>
document.getElementById('chat-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const message = document.getElementById('chat-message').value;
    fetch('<?php echo e(route('chat.store', $user->id)); ?>', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ message }),
    }).then(() => {
        location.reload();
    });
});
</script>

<?php /**PATH C:\xampp\htdocs\msoshub1\resources\views/chat.blade.php ENDPATH**/ ?>