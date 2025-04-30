<div>
    <h1> Congrats! Job is now live on our website </h1>

    <h2> Job Title: {{ $job->title }}</h2>
    <h3> Job salary: {{ $job->salary }}</h3>

    <p>
        <a href="{{ url('/jobs/' . $job->id) }}">View your Job listing</a>
    </p>
</div>
