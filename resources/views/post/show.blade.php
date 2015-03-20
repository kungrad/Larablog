@extends('layout.bootstrap3.main')

@section('meta-title', $post->title)
@section('meta-subtitle', 'Posted by '.link_to_route('user.show', $post->user->username, $post->user->username).' on '.date('M d Y', strtotime($post->created_at)))

@section('styles')
    <link rel="stylesheet" href="https://highlightjs.org/static/styles/monokai_sublime.css">
@stop

@section('content')

    <article>
        <div class="row">
            <div class="col-lg-12">
                {!! $post->content !!}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @foreach ($post->tags as $tag)
                    {!! link_to_route('tag.show', '#'.$tag->name, $tag->slug) !!}
                @endforeach
            </div>
        </div>
    </article>

    @if ($post->allow_comments)
        <hr>
        <div id="disqus_thread"></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES * * */
            var disqus_shortname = '{{$setting->disqus_shortname}}';
            
            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
    @endif

@stop

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@stop