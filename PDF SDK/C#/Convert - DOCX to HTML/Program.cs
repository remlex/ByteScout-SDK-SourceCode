//*******************************************************************
//       ByteScout PDF SDK		                                     
//                                                                   
//       Copyright © 2016 ByteScout - http://www.bytescout.com       
//       ALL RIGHTS RESERVED                                         
//                                                                   
//*******************************************************************

using System.Diagnostics;
using System.IO;
using Bytescout.PDF.Converters;

namespace ConvertDocxToHtml
{
	/// <summary>
	/// This example demonstrates how to convert Microsoft Word DOCX document to HTML file.
	/// </summary>
	class Program
	{
		static void Main()
		{
            // Create converter instance
		    using (DocxToHtmlConverter converter = new DocxToHtmlConverter())
		    {
                // Perform conversion
		        converter.ConvertDocxToHtml("sample.docx", "result.html", false);
		    }

		    // Open result document in Internet Explorer
		    Process.Start("iexplore.exe", Path.GetFullPath("result.html"));
		}
	}
}
