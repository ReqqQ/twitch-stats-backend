<button class="btn btn-outline-purple w-100 d-flex justify-content-between mb-4" type="button" data-bs-toggle="collapse"
        data-bs-target="#{{$icon}}"
        aria-expanded="false" aria-controls="collapseExample">
    <span> <x-images.image-menu imageWidth="25" imageSrc='{{asset("images/dashboard/$icon.svg")}}'/> </span>
    <span>{{$menuName}}</span>
    <span><x-images.image-menu imageWidth="25" imageSrc='{{asset("images/dashboard/arrow-bottom.svg")}}'/> </span>
</button>
<div class="collapse" id="{{$icon}}">
    Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user
    activates the relevant trigger.
</div>
