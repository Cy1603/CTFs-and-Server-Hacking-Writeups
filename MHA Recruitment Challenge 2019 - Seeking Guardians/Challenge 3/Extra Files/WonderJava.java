import android.widget.Button;
import android.widget.TextView;
import java.security.MessageDigest;
import javax.crypto.Cipher;
import javax.crypto.spec.IvParameterSpec;
import javax.crypto.spec.SecretKeySpec;

public class MainActivity extends c {
    public String a(String str) {
        byte[] decode = Base64.decode(str, 0);
        byte[] bArr = new byte[decode.length];
        for (int i = 0; i < decode.length; i++) {
            bArr[i] = (byte) (((byte) (decode[i] - 7)) ^ 193);
        }
        return new String(bArr);
    }

    /* access modifiers changed from: protected */
    public void onCreate(Bundle bundle) {
        super.onCreate(bundle);
        setContentView((int) R.layout.activity_main);
        ((Button) findViewById(R.id.btn_encrypt)).setOnClickListener(new OnClickListener() {
            public void onClick(View view) {
                String a2 = "mylongpasswd"; 
                TextView textView = (TextView) MainActivity.this.findViewById(R.id.lbl_quote);
                String hexString = "deadbeef";
                String str = "deadbeefgoodbeef";
                String charSequence = "THISISTHEFLAG"; //FLAG
                try {
					SecretKeySpec secretKeySpec = new SecretKeySpec(MessageDigest.getInstance("SHA-256").digest(a2.getBytes("UTF-8")), "AES"); //To SHA-256: "longpasswd" ->9f0dc2be4178162e02a55141818a253c199ea4dfa889b3fa30f3236c78bde9e2
                    IvParameterSpec ivParameterSpec = new IvParameterSpec(str.getBytes("UTF-8")); //To Bytes(ascii to hex): "deadbeefgoodbeef" -> 64 65 61 64 62 65 65 66 67 6f 6f 64 62 65 65 66
                    Cipher instance = Cipher.getInstance("AES/CBC/PKCS5Padding");
                    instance.init(1, secretKeySpec, ivParameterSpec);
                    String encodeToString = Base64.encodeToString(instance.doFinal(charSequence.getBytes()), 0); /* fRwyt+Lz+ZTBY6lnHqAyBbhYVSHdCF8cKNCudCrqZxAIIq+V2L40XrVMezTecUa0 */
                    b b = new a(MainActivity.this).b();
                    b.setTitle("WonderCrypt");
                    b.a("Message succesfully encrypted!!");
                    b.a(-3, "OK", new DialogInterface.OnClickListener() {
                        public void onClick(DialogInterface dialogInterface, int i) {
                            dialogInterface.dismiss();
                        }
                    });
                    b.show();
                    ((TextView) MainActivity.this.findViewById(R.id.txt_encrypted)).setText(encodeToString);
                } catch (Exception e) {
                    throw new RuntimeException(e);
                }
            }
        });
    }
}