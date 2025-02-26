<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <div class="-mx-3 md:flex mb-6">
        <div class="md:w-1/2 px-3">
            <x-label for="course name*" class="block uppercase text-xs font-bold mb-2" />
            <div class="relative">
                <select name="course_id" placeholder="Select a question type" class="form-select block
                appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8
                rounded">
                    <option>Select an option</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}"  @if ((isset($coursemodule) &&  $coursemodule->course_id == ($course->id ) || old('course_id') == $course->id )) 
                            selected @endif >{{ $course->name  }}</option>
                    @endforeach
                </select>
            </div>
            <x-error field="code" class="text-red-600" />
        </div>

        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <x-label for="module name*" class="block uppercase text-xs font-bold mb-2" />
            <input type="text" name="name" class="form-input appearance-none block w-full bg-grey-lighter text-grey-darker border border-red
            rounded py-3
            px-4 mb-3" value="{{isset($coursemodule) ? $coursemodule->name : old('name') }}">
            <x-error field="name" class="text-red-600" />
        </div>
    </div>

    <div class="-mx-3 md:flex mb-6">
        
        <div class="md:w-1/2 px-3">
            <x-label for="weight*" class="block uppercase text-xs font-bold mb-2" />
                <input type="number" name="weight" class="form-input appearance-none block w-full bg-grey-lighter text-grey-darker border border-red
                rounded py-3 px-4 mb-3"  step="0.1" max="1"
                value="{{ isset($coursemodule) ? $coursemodule->weight :old('weight') }}" style="border:1px solid rgb(104, 104, 104);">
                <x-error field="weight" class="text-red-600" />
        </div>

        <div class="md:w-1/2 px-3">
            <x-label for="maximum score*" class="block uppercase text-xs font-bold mb-2" />
                <input type="number" name="maximum_score" class="form-input appearance-none block w-full bg-grey-lighter text-grey-darker border border-red
                rounded py-3 px-4 mb-3" 
                value="{{ isset($coursemark) ? $coursemark->maximum_score :old('maximum_score') }}" style="border:1px solid rgb(104, 104, 104);">
                <x-error field="maximum_score" class="text-red-600" />
        </div>
    </div>


        <div class="md:flex place-self-center">
        <button type="submit" class="px-5 bg-white py-2 border-blue-500 border text-blue-500 rounded transition
        duration-300 hover:bg-blue-700 hover:text-white focus:outline-none place-self-center">Save Course Module</button>
    </div>
</div>