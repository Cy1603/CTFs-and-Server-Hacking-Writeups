
import java.math.BigInteger;
import java.util.HashSet;
import java.util.Iterator;
import java.util.Set;
import java.util.TreeMap;
import java.util.Vector;


public class Main {
    
    static BigInteger p = new BigInteger("247510a0783cb074db1692c92d0202c2", 16); //2 × 3 × 17 × 22367366261 × 21240697863613093368835151
    static BigInteger psi = new BigInteger("15203150999469874761994018227585248000"); //Euler function for p = 1 x 2 x 16 x 22367366260 x 21240697863613093368835150 = 15203150999469874761994018227585248000
    static BigInteger g = new BigInteger("9dfe7be3bfe2137afcc40adc3fa22479", 16).mod(p);
    static BigInteger A = new BigInteger("207037dcd2f4af78b1a324e4f6e96f11", 16);    
    static BigInteger B = new BigInteger("01c11ffd3845a67ec0977407e3eced3f", 16);
    static long[] q = new long[]{256L, 125L, 7L, 13L, 17L, 131L, 149L, 241L, 263L, 4252351L, 58375935947731L};
	//factor of psi(Euler function prime factors) = 2^8 * 5^3 * 7 * 13 * 17 * 131 * 149 * 241 * 263 * 4252351 * 58375935947731

    static int q_len = q.length;
    static HashSet[] xi = new HashSet[q_len];
    static BigInteger ai[] = new BigInteger[q_len];
    static HashSet res = new HashSet();
    
    static void rec(int ind)
    {
        if (ind == q_len)
        {
            BigInteger x = BigInteger.ZERO;
            for(int i=0;i<q_len;i++)
            {
                BigInteger mn = new BigInteger(((Long)q[i]).toString());
                BigInteger M = psi.divide(mn);
                x = x.add(ai[i].multiply(M).multiply(M.modInverse(mn)));
            }
            res.add(B.modPow(x.mod(psi), p));
            //res.add(x.mod(psi));
            return;
        }
        
        Iterator<Long> it = xi[ind].iterator();
        while(it.hasNext()){
            ai[ind] = new BigInteger(it.next().toString());
            rec(ind + 1);
        }      
    }
    
    public static void main(String[] args) {

        for(int i=0;i<q_len;i++)
        {
            xi[i] = new HashSet<Long>();
            long qi = q[i];
            int H = (int)Math.sqrt((double)qi) + 1;
                 
            BigInteger _a = g.modPow(psi.divide(new BigInteger(((Long)qi).toString())), p);
            BigInteger _b = A.modPow(psi.divide(new BigInteger(((Long)qi).toString())), p);
            
            BigInteger _c = _a.modPow(new BigInteger(((Integer)H).toString()), p);
            BigInteger _cp = _c;           
            int u_size = 1000000;
            
            boolean stop = false;
            for(int u_part = 1;u_part<=H && !stop;u_part+=u_size)
            {
                if (H > u_size) 
                {
                    System.out.print("[i] Processing ");
                    System.out.println(u_part);
                }
                TreeMap<BigInteger, Integer> table = new TreeMap<>();
                for(int u=u_part;u<=H && u<u_part + u_size;u++)
                {
                    table.put(_cp, u);
                    _cp = _cp.multiply(_c).mod(p);
                }
                BigInteger z = _b;
                for(int v=0;v<=H;v++)
                {
                    if (table.get(z) != null)
                    {
                        xi[i].add((((long)H)*table.get(z) - v) % qi);
                        stop = true;
                        break;
                    }
                    z = z.multiply(_a).mod(p);              
                }
                table.clear();
                System.gc();
            }
            System.out.println(xi[i].toString());
        } 
        rec(0);
        
        Iterator<BigInteger> it = res.iterator();
        while(it.hasNext()){
            System.out.println(it.next().toString(16));
        } 
    }
    
}
