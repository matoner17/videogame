<script>
@if ($event) window.livewire.on('{{ $event }}', params => { @endif

    @if ($event)
        var progressBarContainer = document.getElementById(params.slug);
    @else
        var progressBarContainer = document.getElementById('{{ $slug }}');
    @endif

    var circle = new ProgressBar.Circle(progressBarContainer, {
        color: '#FFFFFF',
        strokeWidth: 6,
        trailWidth: 3,
        trailColor: '#4A5568',
        easing: 'easeInOut',
        duration: 2500,
        text: {
            autoStyleContainer: false
        },
        from: { color: '#48BB78', width: 6 },
        to: { color: '#48BB78', width: 6 },
        step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 100);
            if (value === 0) {
                circle.setText('');
            } else {
                circle.setText(value+'%')
            }
        },
    });

    @if ($event)
        circle.animate(params.rating);
    @else
        circle.animate({{ $rating }} / 100);
    @endif

@if ($event) }); @endif
</script>