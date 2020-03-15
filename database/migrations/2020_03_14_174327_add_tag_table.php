<?php
    
    use App\Tag;
    use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->string('name');
           $table->timestamps();
        });
        
        $default_tags = [
            'Geography',
            'American History',
            'World History',
            'Film',
            'Pop Music',
            'Television',
            'Art',
            'Theatre',
            'Classical Music',
            'Literature',
            'Science',
            'Math',
            'Current Events',
            'Business/Economics',
            'Food/Drink',
            'Games/Sport',
            'Language',
            'Lifestyle',
        ];
        
        foreach ($default_tags as $name) {
            $tag = new Tag();
            $tag->name = $name;
            $tag->save();
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
