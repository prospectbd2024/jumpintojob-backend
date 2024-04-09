<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            'PHP', 'JavaScript', 'Python', 'Java', 'C#', 'C++', 'HTML', 'CSS', 'SQL', 'React', 'Angular', 'Vue.js', 'Node.js', 'Laravel', 'Symfony', 'Express.js', 'Django', 'Flask', 'ASP.NET', 'Ruby', 'Ruby on Rails', 'Swift', 'Kotlin', 'Flutter', 'Dart', 'Rust', 'Go', 'Scala', 'Perl', 'Haskell', 'TypeScript', 'Shell Scripting', 'GraphQL', 'MongoDB', 'MySQL', 'PostgreSQL', 'SQLite', 'Firebase', 'Docker', 'Kubernetes', 'AWS', 'Azure', 'Google Cloud Platform', 'Git', 'SVN', 'Jenkins', 'Travis CI', 'CircleCI', 'RESTful APIs', 'GraphQL APIs', 'Java Spring', 'Spring Boot', 'Hibernate', 'JPA', 'Vue.js 3', 'Nuxt.js', 'Svelte', 'Tailwind CSS', 'Bootstrap', 'Material-UI', 'Next.js', 'Gatsby', 'Electron', 'React Native', 'NativeScript', 'Ionic', 'Cordova', 'Xamarin', 'TensorFlow', 'PyTorch', 'Keras', 'Scikit-learn', 'Pandas', 'NumPy', 'Matplotlib', 'Seaborn', 'NLTK', 'Spacy', 'Scrapy', 'BeautifulSoup', 'Flask-RESTful', 'FastAPI', 'Django REST Framework', 'Fastify', 'Socket.io', 'WebSockets', 'RabbitMQ', 'Kafka', 'Redis', 'Memcached', 'Elasticsearch', 'Logstash', 'Kibana', 'Prometheus', 'Grafana', 'Splunk', 'Nginx', 'Apache', 'IIS', 'HAProxy', 'Varnish', 'Nuxt.js', 'Svelte', 'Tailwind CSS', 'Bootstrap', 'Material-UI', 'Next.js', 'Gatsby', 'Electron', 'React Native', 'NativeScript', 'Ionic', 'Cordova', 'Xamarin', 'TensorFlow', 'PyTorch', 'Keras', 'Scikit-learn', 'Pandas', 'NumPy', 'Matplotlib', 'Seaborn', 'NLTK', 'Spacy', 'Scrapy', 'BeautifulSoup', 'Flask-RESTful', 'FastAPI', 'Django REST Framework', 'Fastify', 'Socket.io', 'WebSockets', 'RabbitMQ', 'Kafka', 'Redis', 'Memcached', 'Elasticsearch', 'Logstash', 'Kibana', 'Prometheus', 'Grafana', 'Splunk', 'Nginx', 'Apache', 'IIS', 'HAProxy', 'Varnish'
        ];

        foreach ($skills as $skill) {
            Skill::create([
                'name' => $skill,
            ]);
        }
    }
}
