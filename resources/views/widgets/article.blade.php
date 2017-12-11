<div class="container list">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @forelse($articles as $article)
            <div class="media">
                <div class="title">
                    <a href="{{ url($article->slug) }}">
                        {{ $article->title }}
                    </a>
                </div>
                <div class="time">{{ $article->published_at->toFormattedDateString() }}</div>
                <div class="info">
                    <i class="ion-person"></i>{{ $article->user->name or 'null' }}&nbsp;,&nbsp;
                    <i class="ion-ios-eye"></i>{{ $article->view_count }}
                </div>
                <div class="media-body">
                    <div class="description">
                        {{ $article->meta_description }}
                    </div>
                    <div class="extra">
                        @foreach($article->tags as $tag)
                        <a href="{{ url('tag', ['tag' => $tag->tag]) }}">
                            <div class="label"><i class="ion-pricetag"></i>{{ $tag->tag }}</div>
                        </a>
                        @endforeach

                        <div class="read-more">
                            <a href="{{ url($article->slug) }}">
                                Read More <i class="ion-arrow-right-c"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @if($article->page_image)
                    <a class="media-right" href="{{ url($article->slug) }}">
                        <img src="{{ $article->page_image }}" data-holder-rendered="true">
                    </a>
                @endif
            </div>
            @empty
                <h3 class="text-center">{{ lang('Nothing') }}</h3>
            @endforelse
        </div>
    </div>
</div>