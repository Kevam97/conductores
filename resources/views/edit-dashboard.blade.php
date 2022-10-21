<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edicion') }}
        </h2>
    </x-slot>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item border-t-0 border-l-0 border-r-0 rounded-none bg-white border border-gray-200">
          <h2 class="accordion-header mb-0 font-semibold text-xl text-gray-800 leading-tight" id="flush-headingOne">
            <button class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                {{ __('Datos usuario') }}
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse border-0 collapse show"
            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body py-4 px-5">
                <livewire:edit-user :user="$user"/>
            </div>
        </div>
        <div class="accordion-item border-l-0 border-r-0 rounded-none bg-white border border-gray-200">
            <h2 class="accordion-header mb-0 font-semibold text-xl text-gray-800 leading-tight" id="flush-headingTwo">
              <button class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                  {{ __('Datos conductor') }}
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse border-0 collapse" aria-labelledby="flush-headingTwo"
              data-bs-parent="#accordionFlushExample">
              <div class="accordion-body py-4 px-5">

                  <livewire:edit-driver :driver="$driver" />
            </div>
        </div>
        <div class="accordion-item border-l-0 border-r-0 rounded-none bg-white border border-gray-200">
            <h2 class="accordion-header mb-0 font-semibold text-xl text-gray-800 leading-tight" id="flush-headingThree">
              <button class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                  {{ __('Referencias personales') }}
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse border-0 collapse" aria-labelledby="flush-headingThree"
              data-bs-parent="#accordionFlushExample">
              <div class="accordion-body py-4 px-5">
                <div class="accordion accordion-flush" id="accordionReference">
                    @foreach ($driver->personalReferences as $reference)
                        <div class="accordion-item border-l-0 border-r-0 border-b-0 rounded-none bg-white border border-gray-200">
                            <h2 class="accordion-header mb-0 font-semibold text-xl text-gray-800 leading-tight" id="{{'flush-headingReference'.$reference->id}}">
                            <button class="accordion-button collapsed relative flex items-center w-full  py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="{{'#flush-collapseReference'.$reference->id}}" aria-expanded="false" aria-controls="{{'flush-collapseReference'.$reference->id}}">
                                    {{$reference->name.' '.$reference->lastname}}
                            </button>
                            </h2>
                            <div id="{{'flush-collapseReference'.$reference->id}}" class="accordion-collapse collapse" aria-labelledby="{{'flush-headingReference'.$reference->id}}"
                            data-bs-parent="#accordionReference">
                                <div class="accordion-body py-4 px-5">
                                    <livewire:edit-personal :reference="$reference">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="accordion-item border-l-0 border-r-0 rounded-none bg-white border border-gray-200">
            <h2 class="accordion-header mb-0 font-semibold text-xl text-gray-800 leading-tight" id="flush-headingFour">
              <button class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                  {{ __('Referencia laborales') }}
              </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse border-0 collapse" aria-labelledby="flush-headingFour"
              data-bs-parent="#accordionFlushExample">
              <div class="accordion-body py-4 px-5">
                <div class="accordion accordion-flush" id="accordionReferenceWork">
                    @foreach ($driver->workReferences as $reference)
                        <div class="accordion-item border-l-0 border-r-0 border-b-0 rounded-none bg-white border border-gray-200">
                            <h2 class="accordion-header mb-0 font-semibold text-xl text-gray-800 leading-tight" id="{{'flush-headingReferenceWork'.$reference->id}}">
                            <button class="accordion-button collapsed relative flex items-center w-full  py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="{{'#flush-collapseReferenceWork'.$reference->id}}" aria-expanded="false" aria-controls="{{'flush-collapseReferenceWork'.$reference->id}}">
                                    {{$reference->company}}
                            </button>
                            </h2>
                            <div id="{{'flush-collapseReferenceWork'.$reference->id}}" class="accordion-collapse collapse" aria-labelledby="{{'flush-headingReferenceWork'.$reference->id}}"
                            data-bs-parent="#accordionReferenceWork">
                                <div class="accordion-body py-4 px-5">
                                    <livewire:edit-work :workReference="$reference">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        <div class="accordion-item border-l-0 border-r-0 rounded-none bg-white border border-gray-200">
            <h2 class="accordion-header mb-0 font-semibold text-xl text-gray-800 leading-tight" id="flush-headingFive">
              <button class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                  {{ __('Cursos') }}
              </button>
            </h2>
            <div id="flush-collapseFive" class="accordion-collapse border-0 collapse" aria-labelledby="flush-headingFive"
              data-bs-parent="#accordionFlushExample">
              <div class="accordion-body py-4 px-5">
                <div class="accordion accordion-flush" id="accordionCourses">
                    @foreach ($driver->courses as $course)
                        <div class="accordion-item border-l-0 border-r-0 border-b-0 rounded-none bg-white border border-gray-200">
                            <h2 class="accordion-header mb-0 font-semibold text-xl text-gray-800 leading-tight" id="{{'flush-headingCourses'.$course->id}}">
                            <button class="accordion-button collapsed relative flex items-center w-full  py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="{{'#flush-collapseCourses'.$course->id}}" aria-expanded="false" aria-controls="{{'flush-collapseCourses'.$course->id}}">
                                    {{$course->name}}
                            </button>
                            </h2>
                            <div id="{{'flush-collapseCourses'.$course->id}}" class="accordion-collapse collapse" aria-labelledby="{{'flush-headingCourses'.$course->id}}"
                            data-bs-parent="#accordionCourses">
                                <div class="accordion-body py-4 px-5">
                                    <livewire:edit-courses :course="$course">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="accordion-item border-l-0 border-r-0 rounded-none bg-white border border-gray-200">
            <h2 class="accordion-header mb-0 font-semibold text-xl text-gray-800 leading-tight" id="flush-headingSix">
              <button class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                  {{ __('Anexos') }}
              </button>
            </h2>
            <div id="flush-collapseSix" class="accordion-collapse border-0 collapse" aria-labelledby="flush-headingSix"
              data-bs-parent="#accordionFlushExample">
              <div class="accordion-body py-4 px-5">
                <div class="accordion accordion-flush" id="accordionCourses">
                    @foreach ($driver->annexes as $annexe)
                        <div class="accordion-item border-l-0 border-r-0 border-b-0 rounded-none bg-white border border-gray-200">
                            <h2 class="accordion-header mb-0 font-semibold text-xl text-gray-800 leading-tight" id="{{'flush-headingAnnnexes'.$course->id}}">
                            <button class="accordion-button collapsed relative flex items-center w-full  py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="{{'#flush-collapseAnnexes'.$annexe->id}}" aria-expanded="false" aria-controls="{{'flush-collapseAnnexes'.$annexe->id}}">
                                    {{$annexe->comment}}
                            </button>
                            </h2>
                            <div id="{{'flush-collapseAnnexes'.$annexe->id}}" class="accordion-collapse collapse" aria-labelledby="{{'flush-headingAnnnexes'.$course->id}}"
                            data-bs-parent="#accordionCourses">
                                <div class="accordion-body py-4 px-5">
                                    <livewire:edit-annexes :annexe="$annexe">

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
