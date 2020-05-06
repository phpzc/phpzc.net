@foreach ($MENU_PROJECT as $project_data)

    <li class="nav-item dropdown"  >
        <a href="javascript:void(0)" class="nav-link @if ($THIS_PROJECT_ID == $project_data['project_id'])
                active
@endif" data-toggle="dropdown"><i class="fe  fe-file-text"></i>{{ $project_data['name'] ?? '' }} </a>
        <div class="dropdown-menu dropdown-menu-arrow">

            @foreach($project_data['summary'] as $summary_data)


                <?php foreach ($summary_data['sub_data'] as $article_data){ ?>


                <a href="/project/detail?id={{ $article_data['id'] ?? '' }}" class='@if ($this_id == $article_data['id']) active @endif dropdown-item' >
                    <b>{{ $article_data['title'] }}</b>
                </a>

                <?php } ?>

            @endforeach

        </div>

    </li>
@endforeach
