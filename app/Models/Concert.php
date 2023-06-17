
class Concert extends Model
{
    use HasFactory;
    protected $fillable=[
        'nameConcert',
        'dateConcert',
        'ticketsAvailable',
        'entryPrice'
    ];
}