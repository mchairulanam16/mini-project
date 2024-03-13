<table>
    <thead>
    <tr>
        <th>id</th>
        <th>kelas</th>
        <th>materi</th>
        <th>asisten</th>
        <th>kode</th>
        <th>peran jaga</th>
        <th>tanggal</th>
        <th>mulai</th>
        <th>selesai</th>
        <th>durasi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->kelas->name }}</td>
            <td>{{ $item->subject->name }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->code->name }}</td>
            <td>{{ $item->teaching_role }}</td>
            <td>{{ $item->date }}</td>
            <td>{{ $item->start }}</td>
            <td>{{ $item->end }}</td>
            <td>{{ $item->duration }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
