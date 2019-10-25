<div class="post" style="border: 2px solid black; border-radius: 5px; padding-left: 5px; padding-right: 5px">
    <div id="header" class="border-bottom">{{ $title }}</div>
    <div id="body">{{ $body }}</div>
    <div id="footer" class="border-top">
        <div id="info" class="text-left" style="width: 70%; display: inline-block">
            Written by {{ $author }} <!--on {{ #article.createdOn|date("Y-m-d") }} at {{ #article.createdOn|date("H:i") }}-->
        </div>
        <div class="text-right" style="width: 29%; display: inline-block">
            <a href="/article/{{ article.id }}">
                Read more...
            </a>
        </div>
    </div>
</div>
