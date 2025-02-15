<style>
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.smart_button').on('click', function() {
                var button = $(this);

                $.ajax({
                    url: button.attr('url'),
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        data: button.attr('data')
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(button.attr('message'));
                            button.addClass('btn-clicked');
                        }
                    },
                    error: function() {
                        alert('An error occurred while processing your request.');
                    }
                });
            });
        });
    </script>

