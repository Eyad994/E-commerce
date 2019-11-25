@foreach ($notifications as $notification)
    
    <li>
        <a href="#">
            <div class="pull-left">
                <img src="{{ asset('dist/img/user') }}" class="img-circle" alt="">
            </div>
            <h4>
                Support Team
                <small><i class="fa fa-clock-o"></i> {{ $notification->created_at->diffForHumans() }}</small>
                <br>
            </h4>

            <p>Show order from <b>Sa</b></p>
            <small>
                <button class="btn btn-info btn-xs pull-right btn-read" value="{{ $notification->order_id }}">Read</button>
            </small>
        </a>
    </li>
    
@endforeach
