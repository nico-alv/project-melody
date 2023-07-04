
class Concert extends Model
{
    use HasFactory;
    protected $fillable=[
        'concert_name',
        'date',
        'stock',
        'price'
    ];
}