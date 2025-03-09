{{-- 
Tham số truyền vào:
name: Tên của input
type: Kiểu của input
label: Nhãn của input
value: Giá trị mặc định của input
required: Có bắt buộc hay không
--}}

@php
    $_name = $attributes['name'];
    $_type = $attributes['type'] ?? 'text';
    $_label = $attributes['label'];
    $_old_value = old($_name);
    $_value = $attributes['value'] ?? '';
    $_value = empty($_old_value) ? $_value : $_old_value;
    $_isrequired = isset($attributes['required']) ? 'required' : '';
@endphp
<div class="mb-3">
    <label for="{{ $_name }}" class="form-label">{{ $_label }}</label>
    <input id="{{ $_name }}" name="{{ $_name }}" value="{{ $_value }}" type="{{ $_type }}"
        {{ $_isrequired }} class="form-control @error($_name) is-invalid @enderror">
    @error($_name)
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>
