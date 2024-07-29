<div class="our-feature" id="our_projects_type">


    @if (app()->getLocale() == 'en')
        <div class="row text-center title featured-projects-title">
            <div class="col">
                <p> featured <span style="color: #FFA515;">projects</span></p>
    @else
                <div class="row text-center title ar-featuerd-title">
                    <div class="col">
                        <p><span style="color: #FFA515;">{{ __('nav.our_features_projects') }}</span></p>
    @endif
</div>
</div>
<div class="row">


    @foreach ($projects as $project)
        <a href="{{ route('project_type', ['project_type' => $project->type]) }}" class="col-md-4 p-0 m-0">
            <img class="w3-image" src="{{ asset('assets/images/home/' . $project->cover_image) }}">
            <p class="text-uppercase text-center centered_project">{{ __('nav.' . $project->type) }}</p>
        </a>
    @endforeach
</div>

</div>