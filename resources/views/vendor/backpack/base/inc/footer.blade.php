@if (config('backpack.base.show_powered_by') || config('backpack.base.developer_link'))
    <div class="text-muted ml-auto mr-auto">
      @if (config('backpack.base.show_powered_by'))
        <a target="_blank" href="https://laisvespartija.lt">Tegyvuoja LA!SVĖ</a>.
      @endif
    </div>
@endif
