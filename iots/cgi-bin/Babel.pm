package Babel;
$VERSION = 1.11;
$MODULENAME = "Babel";
$LASTEDIT = "04/08/05";

### USAGE
###________________________________________________________________________________
###
###	use Babel;
### 
###	$y =  new Babel;
###
###	$s = "Encrypt this!!";
###	$t = $y->encode($s,"A key");
###	$u = $y->decode($t,"A key");
###
###	print "The source string is  $s\n";
###	print "The encrypted string  $t\n";
###	print "The original string   $u\n";
###________________________________________________________________________________
###

require Exporter;
@ISA       = qw(Exporter);
@EXPORT    = qw(encode decode new version modulename lastedit);
@EXPORT_OK = qw(encode decode new version modulename lastedit);

sub new {
    my    $object = {};
    bless $object;
    return $object;
}

sub version {
    return($VERSION);
}

sub modulename {
    return($MODULENAME);
}

sub edited {
    return($LASTEDIT);
}

sub encode{
    shift;
    local ($_P1)= @_;
    shift;
    local ($_K1)= @_;

    my @_p = ();
    my @_k = ();
    my @_e = ();
    my $_l = "";
    my $_i = 0;
    my $_j = 0;
    my $_r = "";
    my $_t = 0;
    my $_h = 0;
    my $_o = 0;
    my $_d =0;
    my @_t =();
    my $_w ="";
        

    while ( length($_K1) < length($_P1) ) { $_K1=$_K1.$_K1;}

    $_K1=substr($_K1,0,length($_P1));

    @_p=split(//,$_P1);
    @_k=split(//,$_K1);

    foreach $_l (@_p) {
       $_t = ord($_l) * ord($_k[$_i]);
       $_o = $_t % 256;
       $_h = int $_t / 256; 
       $_o = $_o ^ ord($_k[$_i]);
       $_h = $_h ^ ord($_k[$_i]);
       $_i++;
       $_j=$_j+2;

       $_e[$_j]   = chr ($_o);
       $_e[$_j+1] = chr ($_h);
                      }

       $_r = join '',@_e;

       for($_d=0;$_d < length($_r);$_d++) {
        $_t[$_d]=sprintf("%02x",ord(substr($_r,$_d,1)));
                                        }

       $_w = join '',@_t;

       $_w =~ s/a/\./g;
       $_w =~ s/b/-/g;
       $_w =~ s/c/\+/g;
       $_w =~ s/d/\!/g;
       $_w =~ s/e/\*/g;
       $_w =~ s/f/\^/g;

       return reverse($_w);    
}

sub decode{
    shift;
    local ($_P1)= @_;
    shift;
    local ($_K1)= @_;
    
    $_P1 = reverse($_P1);

    $_P1 =~ s/\./a/g;
    $_P1 =~ s/-/b/g;
    $_P1 =~ s/\+/c/g;
    $_P1 =~ s/\!/d/g;
    $_P1 =~ s/\*/e/g;
    $_P1 =~ s/\^/f/g;

    my @_p = ();
    my @_k = ();
    my @_e = ();
    my $_l = "";
    my $_i = 0;
    my $_j = 0;
    my $_r = "";
    my $_t = 0;
    my $_h = 0;
    my $_o = 0;
    my $_d = 0;
    my @_w1= ();
    my $_w2= "";

    for($_d=0;$_d < length($_P1);$_d=$_d+2) {
        $_w1[$_d]=chr(hex(substr($_P1,$_d,2)));
                                           }
    $_w2=join '',@_w1;

    $_P1=$_w2;

    while ( length($_K1) < length($_P1) ) { $_K1=$_K1.$_K1;}

    $_K1=substr($_K1,0,length($_P1));

    @_p=split(//,$_P1);
    @_k=split(//,$_K1);

    while ( $_i < scalar(@_p) ) {
            $_o = ord($_p[$_i]);
            $_h = ord($_p[$_i+1]);
            $_o = $_o ^ ord ($_k[$_j]);
            $_h = $_h ^ ord ($_k[$_j]);
            $_h = $_h * 256;
            $_l = $_h + $_o;
            $_l = $_l / ord ($_k[$_j]);
            $_e[$_j] = chr($_l);
            $_j++;
            $_i=$_i+2;
                                }
                      
    $_r = join '',@_e;

    return $_r;    
}

1;

