{{-- 
Varaible passed:
    $posts (Array)
    $page (int)
    $pageTotal (int)
    $username (string)
--}}

<?
    $nextPage = "/$username" . "/postlist/page_" . ($page + 1);
    if ($page - 1 == 1) {
        $prevPage = "/$username" . "/postlist";
    } else {
        $prevPage = "/$username" . "/postlist/page_" . ($page - 1);
    }
?>

@extends('main')

@section('container')
    <div class="row">
        <div class="col-sm-8 blog-main">
            <table class="table table-hover table-postlist">
                <thead>
                    <th colspan="3">
                        <h3 class="text-center">Article List</h3>
                    </th>
                </thead>
                @for ($i = 0; $i < count($posts); $i++)
                    <tr>
                        <td><a href="{{ route('show_post',[
                                                        'username' => $username,
                                                        'url' => $posts[$i]->url ]) }}">
                            {{ $posts[$i]->title }}
                            </a>
                        </td>
                        <td width="20%">{{ $posts[$i]->create_time }}</td>
                        <td width="10%">{{ $username }}</td>
                    </tr>
                @endfor
            </table>

            <nav>
                <ul class="pager">
                    @if ($page == 1)
                        <li><a href="#" class="btn btn-xs disabled">Newer</a></li>
                        <li><a href="{{ $nextPage }}" class="btn btn-xs">Older</a></li>   
                    @elseif ($page == $pageTotal)
                        <li><a href="{{ $prevPage }}" class="btn btn-xs">Newer</a></li>
                        <li><a href="#" class="btn btn-xs disabled">Older</a></li>
                    @else
                        <li><a href="{{ $prevPage }}" class="btn btn-xs">Newer</a></li>
                        <li><a href="{{ $nextPage }}" class="btn btn-xs">Older</a></li>
                    @endif
                </ul>
            </nav>
        </div>

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>About</h4>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>
            <div class="sidebar-module">
                <h4>Archives</h4>
                <ol class="list-unstyled">
                    <li><a href="#">March 2014</a></li>
                    <li><a href="#">February 2014</a></li>
                    <li><a href="#">January 2014</a></li>
                    <li><a href="#">December 2013</a></li>
                    <li><a href="#">November 2013</a></li>
                    <li><a href="#">October 2013</a></li>
                    <li><a href="#">September 2013</a></li>
                    <li><a href="#">August 2013</a></li>
                    <li><a href="#">July 2013</a></li>
                    <li><a href="#">June 2013</a></li>
                    <li><a href="#">May 2013</a></li>
                    <li><a href="#">April 2013</a></li>
                </ol>
            </div>      
            <div class="sidebar-module">
                <h4>Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                </ol>
            </div>
        </div>

    </div>
@stop
