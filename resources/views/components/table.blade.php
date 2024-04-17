@props(['data'])

<table>
    <thead>
        <tr>
            @foreach ($data['headers'] as $header)
                <th scope="col">
                    {{ $header['text'] }}
                </th>
            @endforeach

    </thead>
    <tbody>
        @foreach ($data['rows'] as $row)
            <tr>
                @foreach ($row['cells'] as $cell)
                    <td>
                        @if (is_array($cell))
                            @foreach ($cell as $button)
                                {!! $button !!}
                            @endforeach
                        @else
                            {{ $cell }}
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach

    </tbody>
</table>
