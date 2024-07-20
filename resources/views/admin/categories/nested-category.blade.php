{{-- @dd($parent) --}}
{{-- @php($nameParent = $category->name) --}}
<option value="{{ $category->id }}">{{ $parent->name }}{{ $each }}  {{ $category->name }}</option>
@if ($category->children)
    @php($each .= ' -> ')
    @foreach ($category->children as $child)
        @include('admin.categories.nested-category', ['category' => $child])
    @endforeach
@endif
