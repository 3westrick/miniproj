@if(session()->has('message'))
    <div id="message" style="background-color: #1f9e67;color: white; text-align: center; padding-bottom: 16px; padding-top: 16px">
    <p>
        {{ session('message') }}
    </p>
    </div>
    <script>
        const message = document.getElementById('message')
        setTimeout(()=>{
            message.remove()
        }, 7000)
        message.addEventListener('click', (e)=>{
            message.remove()
        })

    </script>
@endif
