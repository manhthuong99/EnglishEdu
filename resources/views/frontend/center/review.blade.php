@foreach( $reviews as $review)
    <div class="comment-block" id="comment-show">
        <div class="comment-block__header">
            <div class="avatar-group">
                <figure class="avatar">
                    <img
                        src="{{ asset('storage/avatars/'.$review['user']['avatar']) }}"
                        alt="Mat Duong" data-ll-status="loaded"
                        class="loaded">
                </figure>
                <div class="avatar-group__info">
                    <div
                        class="user-name">{{ $review['user']['full_name'] }}</div>
                    <div class="user-rate-info">
                        <div class="rating-group">
                            <div class="rating-stars rating-stars">
                                @for( $i = 0; $i < $review['rate']; $i++)
                                    <span
                                        class="icon icon-sm i-star "></span>
                                @endfor
                            </div>&nbsp;<time>{{ date("d/m/Y H:m:s", strtotime($review['created_at'])) }}</time>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="comment-block__content">
            <p>
                {{ $review['comment'] }}
            </p>
        </div>
        <label for="review-main-47130" class="readmore-trigger"></label>
        <div class="divider"></div>
    </div>
@endforeach
